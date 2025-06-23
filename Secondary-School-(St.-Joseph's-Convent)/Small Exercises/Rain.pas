Program Rain;

{This program prompts the user to input the amount of rainfall over a period of days and calculates and outputs the average rainfall}
{Created by : Arianna St.John}
{Date : 09/06/2022}

Var
    Rainfall, Total, Average : Real;
    Days : Integer;
Begin
    Total:= 0;
    Days := 0;
    Write ('Enter the amount of rainfall for each day: ');
    Readln (Rainfall);
    While Rainfall <> 9999 
    Do
    Begin
        Total := Total + Rainfall;
        Days := Days + 1;
        Write ('Enter the amount of rainfall for each day: ');
        Readln (Rainfall);
    End;
    Average := Total / Days;
    Writeln ('The average rainfall is: ', Average : 0 : 2);
End.