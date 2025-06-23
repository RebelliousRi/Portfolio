Program High;

{The program prompts the user to input two unequal values, determines and outputs the higher value}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    A, B, Higher : Real;
Begin
    Write ('Enter two unequal values: ');
    Readln (A, B);
    If A > B  
    Then 
        Higher := A
    Else
        Higher := B;
    Writeln ('The higher value is: ', Higher : 0 : 2);
End.