Program AnnualRainfall;

{This program prompts the user to input the amount of rainfall for each month of the year, calculates the total yearly rainfall and average for each month and prints the total and average}
{Created by : Arianna St.John}
{Date : 10/10/2022}

Var
    Rainfall, Average, TotRainfall : Real;
    Month : Integer;
Begin
    TotRainfall := 0;
    For Month := 1 to 12 
    Do
    Begin
        Write ('Enter the total rainfall for a month: ');
        Readln (Rainfall);
        TotRainfall := TotRainfall + Rainfall;
    End;
    Average := TotRainfall / 12;
    Writeln ('The total rainfall for the year is: ', TotRainfall : 0 : 2);
    Writeln ('The average rainfall for the year is: ', Average : 0 : 2);
End.