Program DiscountCalculator;

{The program prompts the user to input the price and quantity of an item, calculates the total and discount amount and outputs it}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Price, Quantity, Discount, Total : Real;
Begin
    Write ('Enter the price and quantity of an item: ');
    Readln (Price, Quantity);
    Total := Price * Quantity;
    If Total <= 10000 
    Then
        Discount := Total * 0.10
    Else
        Discount := Total * 0.05;
    Writeln ('The discount is: ', Discount : 0 : 2);
    Writeln ('The total is: ', Total : 0 : 2);
End.