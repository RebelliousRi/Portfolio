Program TenNumbers;

{This program prompts the user to input 10 numbers, determines and prints the highest and lowest numbers}
{Created by : Arianna St.John}
{Date : 10/25/2022}

Var
    Num, Min, Max : Real;
    N : Integer;
Begin
    Min := 99999;
    Max := 0;
    For N := 1 to 10 Do
    Begin
        Write ('Enter a number: ');
        Readln (Num);
        If Num > Max Then
            Max := Num;
        If Num < Min Then
            Min := Num;
    End;
    Writeln ('The highest number is: ', Max : 0 : 2);
    Writeln ('The lowest number is: ', Min : 0 : 2);
End.