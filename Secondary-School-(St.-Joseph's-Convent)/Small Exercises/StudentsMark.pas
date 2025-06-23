Program StudentsMark;

{This program prompts the user to input the marks of students, calculates and prints the average mark}
{Created by : Arianna St.John}
{Date : 09/12/2022}

Var
    Marks, Total, Average : Real;
    Students : integer;
Begin 
    Total := 0;
    Students := 0;
    Write ('Enter the marks of students: ');
    Readln (Marks);
    While Marks <> 999 
    Do
    Begin
        Total := Total + Marks;
        Students := Students+1;
        Write ('Enter the marks of students: ');
        Readln (Marks);
    End;
    Average := Total / Students;
    Writeln ('The average is: ', Average : 0 : 2);
End.