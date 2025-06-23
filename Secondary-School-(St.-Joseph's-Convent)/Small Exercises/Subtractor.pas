Program Subtractor;

{This program prompts the user to input two numbers, it calculates the dIfference between the two numbers and outputs it}
{Created by : Arianna St.John}
{Date : 01/11/2021}

Var
    A, B, Answer : Real;
Begin
    Write ('Enter two numbers: ');
    Readln (A, B);
    Answer := A - B;
    Writeln ('Answer is: ', Answer : 0 : 2);
End.