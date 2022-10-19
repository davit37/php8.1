<?php

class Category {
    public readonly string $id;
    public readonly string $name;

    // public function __construct()

    public function __construct(string $id, string $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

$category = new Category("1", "Gedget");

var_dump($category->id);
$category->id = "123";

// $category->setId("1");
// $category->setId("2");