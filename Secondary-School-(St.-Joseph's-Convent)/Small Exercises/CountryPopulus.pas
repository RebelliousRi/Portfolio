Program CountryPopulus;

{This program prompts the user to input the names and populations of a number of Caribbean countries. terminated by 0, determines and prints the name of the country with the highest population}
{Created by : Arianna St.John}
{Date : 10/25/2022}

Var
    Max, Pop : Integer;
    Name, HighName : String;
Begin
    Max := 0;
    Write ('Enter the name and population of a country: ');
    Readln (Name);
    Readln (Pop);
    While Pop <> 0 Do
    Begin
        If Pop > Max Then
        Begin
            Max := Pop;
            HighName := Name
        End;
        Write ('Enter the name and population of a country: ');
        Readln (Name);
        Readln (Pop);
    End;
    Writeln ('The name of the country with the highest population is: ', HighName);
End.