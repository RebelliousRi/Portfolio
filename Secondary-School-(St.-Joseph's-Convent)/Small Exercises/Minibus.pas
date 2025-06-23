Program Minibus;

{This program prompts the user to enter the number of passengers on a minibus for each day, terminated by 0, it calculates and prints the daily revenue and the the number of passengers for each day}
{Created by : Arianna St.John}
{Date : 10/21/2022}

Var
    Passengers : Integer;
    Revenue : Real;
Begin
    Write ('Enter the number of of passengers for each day: ');
    Readln (Passengers);
    While Passengers <> 0 
    Do
    Begin
        Revenue := Passengers * 1.5;
        Writeln ('The number of passengers for each day is: ', Passengers);
        Writeln ('The daily revenue is: ', Revenue : 0 : 2);
        Write ('Enter the number of of passengers for each day: ');
        Readln (Passengers);
    End;
End.