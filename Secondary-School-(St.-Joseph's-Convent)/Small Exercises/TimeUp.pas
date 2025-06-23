Program TimeUp;

{This program prompts the user to input the number of days a person has been using a demo tape and if it exceeds 12 it outputs a message}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Days : Integer;
Begin
    Write ('Enter the number of days a person has been using a demo tape: ');
    Readln (Days);
    If Days > 12 
    Then
        Writeln ('Time up');
End.