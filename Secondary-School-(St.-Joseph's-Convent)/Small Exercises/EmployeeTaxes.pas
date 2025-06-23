Program EmployeeTaxes;

{This program prompts the user to enter the employees income, determines the amount of tax they have to pay, calculates and outputs the total tax from all employees}
{Created by : Arianna St.John}
{Date : 10/21/2022}

Var
    Income, Number : Real;
    Tax, TotalTax : Integer;
Begin
    TotalTax := 0;
    Write ('Enter the employees income: ');
    Readln (Income);
    Write ('Enter the employees number: ');
    Readln (Number);
    While Number <> 0 
    Do
    Begin
        If (Income > 20000) and (Income < 30000) 
        Then
            Tax := 12000
        Else
        If  (Income > 30000) and (Income < 40000) 
        Then
            Tax := 15000;
        TotalTax:=TotalTax+Tax;
        Write ('Enter the employees income: ');
        Readln (Income);
        Write ('Enter the employees number: ');
        Readln (Number);
    End;
    Writeln ('The total tax is: ', TotalTax);
End.