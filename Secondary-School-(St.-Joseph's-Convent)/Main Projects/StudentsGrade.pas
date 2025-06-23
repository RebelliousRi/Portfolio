Program StudentsGrade;

{This program inputs the name of a student and the mark they received, determines the grade, and outputs the student's name and their grade}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Name : String;
    Mark : Real;
    Grade : Char;
Begin
    Write ('Enter the name and mark of a student: ');
    Readln (Name, Mark);
    If Mark >= 80 
    Then
        Grade := 'A'
    Else
    If (Mark >= 65) and (Mark < 80) 
    Then
        Grade := 'B'
    Else
    If (Mark >= 50) and (Mark < 65) 
    Then
        Grade := 'C'
    Else
    If (Mark >= 35) and (Mark < 50) 
    Then
        Grade := 'D'
    Else
    If Mark < 35 
    Then
        Grade := 'F';
    Writeln ('The student''s name is: ', Name);
    Writeln ('The student''s grade is: ', Grade);
End.