Program DepartureTax;

{This program prompts the user to input the passenger number which is terminated by 0 and determines the tax that they pay based on the type of passenger they are, calculates and prints the total amount of tax collected for the day}
{Created by : Arianna St.John}
{Date : 10/22/2022}

Var
    Number, Tax, TotTax : Integer;
    Passenger : String;
Begin
    TotTax := 0;
    Write ('Enter the passenger type: ');
    Readln (Passenger);
    Write ('Enter the passenger Number: ');
    Readln (Number);
    While Number <> 0 
    Do
    Begin
        If Passenger = 'Resident' 
        Then
            Tax := 100
        Else
        If Passenger = 'Visitor' 
        Then
            Tax := 120;
        TotTax := TotTax + Tax;
        Write ('Enter the passenger type: ');
        Readln (Passenger);
        Write ('Enter the passenger Number: ');
        Readln (Number);
    End;
    Writeln ('The total tax collected for the day is: ', TotTax);
End.