Program AthleticFinal;

{This program prompts the user to input a set terminated by C and the points awarded for each race, calculates and prints the total points gained by each set}
{Created by : Arianna St.John}
{Date : 10/25/2022}

Var
    TeamSet : String;
    Points, APoints, BPoints : Integer;
Begin
    APoints := 0;
    BPoints := 0;
    Write ('Enter the set and the points awarded for each race: ');
    Readln (TeamSet, Points);
    While TeamSet <> 'C' 
    Do
    Begin
        If TeamSet = 'A' 
        Then
            APoints := APoints + Points
        Else If TeamSet = 'B' 
        Then
            BPoints := BPoints + Points;

        Write ('Enter the set and the points awarded for each race: ');
        Readln (TeamSet, Points);
    End;
    Writeln ('The total Points gained by Set A is: ', APoints);
    Writeln ('The total Points gained by Set B is: ', BPoints);
End.
