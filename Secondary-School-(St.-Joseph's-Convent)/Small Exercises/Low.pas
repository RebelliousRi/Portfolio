Program Low;

{The program prompts the user to input two unequal values, determines and outputs the lower value}
{Created by : Arianna St.John}
{Date : 17/01/2022}

Var
    A, B, Lower : Real;
    Begin
    Write ('Enter two unequal values': );
    Readln (A, B);
    If A < B  
    Then 
        Lower := A
    Else
        Lower := B;
    Writeln ('The lower value is: ', Lower : 0 : 2);
End.