<?php

class Person {
    public function __construct(public string $name) {

    }

    public function sayHello($name): string {
        return "Hello $name, my name is $this->name";
    }
}

$person = new Person("Davit");

$reference = $person->sayHello(...);

var_dump($reference("Eko"));