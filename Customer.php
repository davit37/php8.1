<?php

enum Gender {
    case Male;
    case Female;
}

class Customer {

    public function __construct(public string $id, public string $name, public Gender $gender) 
    {
    }
}

function sayHello(Customer $customer): string {
    if($customer->gender == Gender::Male) {
        return "Hello Mr. ".$customer->name;
    }elseif($customer->gender == Gender::Female) {
        return "Hello Mrs. ".$customer->name;
    }else {
        return "Hello ".$customer->name;
    }
}

echo sayHello(new Customer("1", "Budi", Gender::Male));
echo sayHello(new Customer("2", "Sinta", Gender::Female));

var_dump(Gender::cases());
