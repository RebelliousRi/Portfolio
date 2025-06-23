Program MostMoney;

{This program prompts the user to input the names and amount of money collected by each student in a class of 20, determines and prints the name of the student who collected the most money and outputs it together with 10% of the amount the student collected}
{Created by : Arianna St.John}
{Date : 10/25/2022}

Var
    Max, Money, Percent : Real;
    Students : Integer;
    Name, HighName : String;
Begin
    Max := 0;
    For Students := 1 to 20 Do
    Begin
        Write ('Enter the name and amount of money collected by a student: ');
        Readln (Name);
        Readln (Money);
        If Money > Max Then
        Begin
            Max := Money;
            HighName := Name
        End;
    End;
    Percent := Max * 10 / 100;
    Writeln ('The name of the student who collected the most money is: ', HighName);
    Writeln ('10% of the amount the student collected is: ', Percent : 0 : 2);
End.