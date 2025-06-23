Program DailyTemperature;

{This program prompts the user to input the temperature for each day in a month, terminated by 9999, determines and prints the  lowest one and calculates and prints the average temperature}
{Created by : Arianna St.John}
{Date : 10/25/2022}

Var
    Temp, Total, Average, Min : Real;
    Days : Integer;
Begin
    Min := 99999;
    Total := 0;
    Days := 0;

    Write ('Enter the temperature for each day: ');
    Readln (Temp);
    While Temp <> 9999 Do
    Begin
        If Temp < Min Then
            Min := Temp;

        Total := Total + Temp;
        Days := Days + 1;
        Write ('Enter the temperature for each day: ');
        Readln (Temp);
    End;
    Average := Total / Days;
    Writeln ('The lowest temperature is: ', Min : 0 : 2);
    Writeln ('The average temperature is: ', Average : 0 : 2);
End.