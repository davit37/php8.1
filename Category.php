<?php

class Category {

    public function __construct(public readonly string $id, public readonly string $name) {
    }
}

$category = new Category("1", "Gedget");

var_dump($category->id);
// $category->id = "123";

// $category->setId("1");
// $category->setId("2");