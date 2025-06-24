package assignment2;

public class Main {
    public static void main(String[] args) {
        System.out.println("=== Exercise 1: Merging Sorted Linked Lists ===");
        LinkedList list1 = new LinkedList();
        LinkedList list2 = new LinkedList();

        // First sorted list: 1->3->5->7
        list1.insert(1);
        list1.insert(3);
        list1.insert(5);
        list1.insert(7);

        // Second sorted list: 2->4->6->8
        list2.insert(2);
        list2.insert(4);
        list2.insert(6);
        list2.insert(8);

        System.out.print("First List: ");
        list1.display();
        System.out.print("Second List: ");
        list2.display();

        LinkedList mergedList = LinkedList.mergeSortedLists(list1, list2);
        System.out.print("Merged List: ");
        mergedList.display();

        System.out.println("\n=== Exercise 2: Finding Max/Min in Queue ===");
        Queue queue = new Queue();
        queue.enqueue(14);
        queue.enqueue(7);
        queue.enqueue(9);
        queue.enqueue(10);
        queue.enqueue(11);
        queue.enqueue(5);
        queue.enqueue(32);
        queue.enqueue(60);
        queue.enqueue(74);
        queue.enqueue(4);
        queue.enqueue(24);

        System.out.print("Queue elements: ");
        queue.display();
        System.out.println("Maximum: " + queue.findMax());
        System.out.println("Minimum: " + queue.findMin());

        System.out.println("\n=== Exercise 3: Decimal to Binary Conversion ===");
        Stack stack = new Stack();
        double[] testNumbers = {0.0, 0.5, 1.25, 2.75, 3.125, 4.375, 5.625, 10.75};
        
        for (double num : testNumbers) {
            String binary = stack.decimalToBinary(num);
            System.out.println("Decimal: " + num + " -> Binary: " + binary);
        }
    }
} 