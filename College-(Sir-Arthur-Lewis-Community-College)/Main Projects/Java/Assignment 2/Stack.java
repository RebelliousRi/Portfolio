package assignment2;

public class Stack {
    private Node top;
    private int size;

    public Stack() {
        top = null;
        size = 0;
    }

    public void push(int data) {
        Node newNode = new Node(data);
        newNode.next = top;
        top = newNode;
        size++;
    }

    public int pop() {
        if (isEmpty()) {
            throw new IllegalStateException("Stack is empty");
        }
        int data = top.data;
        top = top.next;
        size--;
        return data;
    }

    public boolean isEmpty() {
        return top == null;
    }

    public int size() {
        return size;
    }

    public String decimalToBinary(double decimal) {
        if (decimal == 0) {
            return "0";
        }

        // Clear the stack
        while (!isEmpty()) {
            pop();
        }

        // Split the number into integer and fractional parts
        int integerPart = (int) decimal;
        double fractionalPart = decimal - integerPart;

        // Convert integer part to binary
        StringBuilder binary = new StringBuilder();
        if (integerPart == 0) {
            binary.append("0");
        } else {
            while (integerPart > 0) {
                push(integerPart % 2);
                integerPart = integerPart / 2;
            }
            while (!isEmpty()) {
                binary.append(pop());
            }
        }

        // Convert fractional part to binary (up to 8 decimal places)
        if (fractionalPart > 0) {
            binary.append(".");
            int decimalPlaces = 0;
            while (fractionalPart > 0 && decimalPlaces < 8) {
                fractionalPart *= 2;
                if (fractionalPart >= 1) {
                    binary.append("1");
                    fractionalPart -= 1;
                } else {
                    binary.append("0");
                }
                decimalPlaces++;
            }
        }

        return binary.toString();
    }

    public void display() {
        Node current = top;
        while (current != null) {
            System.out.print(current.data + " ");
            current = current.next;
        }
        System.out.println();
    }
} 