<?php

interface SayHello {
    function sayHello(): string;
}

trait IndonesiaGender {
    function inIndonesia(): string 
    {
        return match($this) {
            Gender::Male => "Tuan",
            Gender::Female => "Nyonya"
        };
    }
}

enum Gender: string  implements sayHello{
    use IndonesiaGender;

    case Male = "Mr.";
    case Female = "Mrs.";

    const Unknown = "Unknown";

    static function fromIndonesia(string $value): Gender {
        return match($value) {
            "Tuan" => Gender::Male,
            "Nyonya" => Gender::Female,
            default => throw new Exception("Unsuported Indonesian Value")
        };
    }

    function sayHello():string {
        return "Hello ".$this->value;
    }


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

var_dump(Gender::Male->sayHello());
var_dump(Gender::Female->sayHello());
var_dump(Gender::Female->inIndonesia());
var_dump(Gender::fromIndonesia("Tuan"));
var_dump(Gender::fromIndonesia("Nyonya"));
// var_dump(Gender::fromIndonesia("salah")); //error
var_dump(Gender::Unknown);
