<?php

namespace App\App\Pipelines;

use Closure;
use Illuminate\Container\Container;
use Illuminate\Support\Arr;
use ReflectionMethod;

class CustomPipeline extends Pipeline
{
    private $pipeline;
    public $passable = [];
    public function __construct($pipeline)
    {
        parent::__construct(app(Container::class));
        $this->pipeline = $pipeline;
    }
    protected function getPipelineParameters($pipe)
    {
        $reflectionMethod = new ReflectionMethod($pipe, $this->method);
        return $reflectionMethod->getParameters();
    }
    public function then(Closure $destination)
    {
        $pipeline = array_reduce(
            $this->pipes(), $this->carry(), $this->prepareDestination($destination)
        );
        return $pipeline($this->passable);
    }
    public function send(...$passable)
    {
        foreach ($this->pipes as $key => $pipe) {
            $reflectionMethod = new ReflectionMethod($pipe, $this->method);
            foreach ($this->getPipelineParameters($pipe) as $key => $parameter) {
                if (isset($passable[$key]) && !property_exists($this, $parameter->getName() && $parameter->getName() != 'next')) {
                    $this->{$parameter->getName()} = $passable[$key];
                    $this->passable[$parameter->getName()] = $parameter->getName();
                }
            }
        }
        return $this;
    }
    public function carry()
    {
        return function ($stack, $pipe) {
            unset($this->passable['next']);

            $parameters = array_merge(Arr::only(get_object_vars($this), $this->passable), ['next' => $stack]);
            $parameters = Arr::only($parameters, array_column($this->getPipelineParameters($pipe), 'name'));
            $pipe = $this->getContainer()->make($pipe);

            $carry = method_exists($pipe, $this->method)
            ? $pipe->{$this->method}(...array_values($parameters))
            : $pipe(...$parameters);

            return $this->handleCarry($carry);

        };
    }
    public function __call($method, $arguments)
    {
        return $this->pipeline->{$method}(...$arguments);
    }
}
