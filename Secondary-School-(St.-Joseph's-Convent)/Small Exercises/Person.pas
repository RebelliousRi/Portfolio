Program Person;

{The program prompts the user to input the mark a student receives in a test and outputs the word pass or fail accordingly}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Mark : Real;
Begin
    Write ('Enter the mark a student received: ');
    Readln (Mark);
    If Mark < 60 
    Then 
        Writeln ('Fail')
    Else
        Writeln ('Pass');
End.