<?php

enum Gender: string {
    case Male = "Mr.";
    case Female = "Mrs.";
}

class Customer {

    public function __construct(public string $id, public string $name, public ?Gender $gender) 
    {
    }
}

function sayHello(Customer $customer): string {

    if($customer->gender == null){
        return "Hello ".$customer->name;
    }else {
        return "Hello ".$customer->gender->value.$customer->name;
    }

}

echo sayHello(new Customer("1", "Budi", Gender::from("Mr."))).PHP_EOL;
echo sayHello(new Customer("2", "Sinta", Gender::Female)).PHP_EOL;
echo sayHello(new Customer("3", "Sinta", Gender::tryFrom("Salah"))).PHP_EOL;

var_dump(Gender::cases());
