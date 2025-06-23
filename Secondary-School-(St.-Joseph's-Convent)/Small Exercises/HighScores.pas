Program HighScores;

{This program prompts the user to input the scores of 30 students, determines and prints the highest score}
{Created by : Arianna St.John}
{Date : 10/25/2022}

Var
    Score, Students, Max : Integer;
Begin
    Max := 0;
    For Students := 1 to 30 Do
    Begin
        Write ('Enter the score of a student: ');
        Readln (Score);
        If Score > Max Then
            Max := Score;
    End;
    Writeln ('The highest score is: ', Max);
End.