Program Pass;

{The program prompts the user to input the pass mark and the mark a student received in a test and outputs the word pass or fail accordingly}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Passmark, Mark : Real;
Begin
    Write ('Enter the pass mark and the mark a student received: ');
    Readln (Passmark, Mark);
    If Mark >= Passmark  
    Then 
        Writeln ('Pass')
    Else
        Writeln ('Fail');
End.