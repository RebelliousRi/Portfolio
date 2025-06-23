Program Ages;

{The program prompts the user to input the ages of three friends, calculates which friend is the oldest and outputs their age}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Age1, Age2, Age3, Oldest : Integer;
Begin
    Write('Enter the ages of three friends: ');
    Readln(Age1, Age2, Age3);
    If (Age1 > Age2) and (Age1 > Age3) 
    Then
        Oldest := Age1
    Else If (Age2 > Age1) and (Age2 > Age3) 
    Then
        Oldest := Age2
    Else
        Oldest := Age3;
    Writeln('The age of the oldest is: ', Oldest);
End.