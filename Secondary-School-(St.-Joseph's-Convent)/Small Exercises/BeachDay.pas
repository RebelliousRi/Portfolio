Program BeachDay;

{This program prompts the user to input the weather for a day and outputs "Good day for the beach" If it is sunny}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Weather : String;
Begin
    Write ('Enter the weather condition for a day: ');
    Readln ( Weather);
    If Weather = 'Sunny' 
    Then
        Writeln ('Good day for the beach');
End.