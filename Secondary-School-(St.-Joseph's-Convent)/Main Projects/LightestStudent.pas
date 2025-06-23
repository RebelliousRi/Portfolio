Program LightestStudent;

{This program prompts the user to input the names and weights of a number of students in a class terminated by 'END', determines and prints the name and weight of the lightest student and calculates and prints the average weight of the class}
{Created by : Arianna St.John}
{Date : 10/25/2022}

Var
    Min, Weight, Total, Average : Real;
    Students : Integer;
    Name, LowName : String;
Begin
    Min := 99999;
    Total := 0;
    Students := 0;
    Write ('Enter the name and weight of a student: ');
    Readln (Name);
    Readln (Weight);
    While Name <> 'END' Do
    Begin
        If Weight < Min Then
        Begin
            Min := Weight;
            LowName := Name
        End;
        Total := Total + Weight;
        Students := Students + 1;
        Write ('Enter the name and weight of a student: ');
        Readln (Name);
        Readln (Weight);
    End;
    Average := Total / Students;
    Writeln ('The name of the lightest student is: ', LowName);
    Writeln ('The weight of the lightest student is: ', Min : 0 : 2);
    Writeln ('The average weight is: ', Average : 0 : 2);
End.