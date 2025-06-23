Program PercentageWin;

{This program prompts the user to input the result of 10 games played by a team, calculates and prints the percentage of games won}
{Created by : Arianna St.John}
{Date : 10/23/2022}

Var
    Result : String;
    Games, Wins : Integer;
    Percentage : Real;
Begin
    Wins := 0;
    For Games := 1 to 10 Do
    Begin
        Write ('Enter the result of a game: ');
        Readln (Result);
        If Result = 'Won' 
        Then
            Wins := Wins + 1
        Else If Result = 'Lost' 
        Then
            Wins := Wins + 0;
    End;
    Percentage := (Wins / 10) * 100;
    Writeln ('The percentage of games won is: ', Percentage : 0 : 2, '%');
End.
