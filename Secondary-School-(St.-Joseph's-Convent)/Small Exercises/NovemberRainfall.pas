Program NovemberRainfall;

{This program prompts the user to input the amount of rainfall for each day of November, calculates and prints the total amount of rainfall for the month}
{Created by : Arianna St.John}
{Date : 10/10/2022}

Var
    Rainfall, TotRainfall : Real;
    Days : Integer;
Begin
    TotRainfall := 0;
    For Days := 1 to 30 
    Do
    Begin
        Write ('Enter the amount of rainfall for 30 days: ');
        Read (Rainfall);
        TotRainfall := TotRainfall + Rainfall;
    End;
    Writeln ('The total amount of rainfall for November is: ', TotRainfall : 0 : 2);
End.