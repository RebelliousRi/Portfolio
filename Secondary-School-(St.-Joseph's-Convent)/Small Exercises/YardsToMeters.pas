Program YardsToMeters;

{This program develops a table that converts Yards to meters}
{Created by : Arianna St.John}
{Date : 11/29/2022}

Var
  Y, MT, N, M, P : Real;
Begin
  Writeln ('Enter two numbers that represent the start and finish values and a number which represents the step value');
  Readln (N, M, P);
  Writeln ('Yards', '    Meters');
  Y := N;
  While Y <= M 
  Do
  Begin
    MT := Y * 0.91;
    Writeln (Y : 0 : 2, '     ', MT : 0 : 2);
    Y := Y + P;
  End;
End.