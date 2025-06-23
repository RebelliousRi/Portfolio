Program SunRainCast;

{This program prompts the user to input the weather condition for each day in December, calculates and prints the number of days for each weather condition}
{Created by : Arianna St.John}
{Date : 10/17/2022}

Var
    Weather : String;
    Sunny, Rainy, Overcast, Days : Integer;
Begin
    Sunny := 0;
    Rainy := 0;
    Overcast := 0;
    For Days := 1 to 31 
    Do
    Begin
        Write ('Enter the weather condition for each day in December: ');
        Readln (Weather);
        If Weather = 'Sunny'
        Then
            Sunny := Sunny + 1
        Else
        If Weather = 'Rainy'
        Then
            Rainy := Rainy + 1
        Else
        If Weather = 'Overcast'
        Then
            Overcast := Overcast + 1;
    End;
    Writeln ('The number of sunny days is: ', Sunny);
    Writeln ('The number of rainy days is: ', Rainy);
    Writeln ('The number of overcast days is: ', Overcast);
End.