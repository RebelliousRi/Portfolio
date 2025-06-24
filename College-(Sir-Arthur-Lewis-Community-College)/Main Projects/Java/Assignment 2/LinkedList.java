package assignment2;

public class LinkedList {
    Node head;

    public LinkedList() {
        head = null;
    }

    public void insert(int data) {
        Node newNode = new Node(data);
        if (head == null || head.data >= data) {
            newNode.next = head;
            head = newNode;
            return;
        }

        Node current = head;
        while (current.next != null && current.next.data < data) {
            current = current.next;
        }
        newNode.next = current.next;
        current.next = newNode;
    }

    public static LinkedList mergeSortedLists(LinkedList list1, LinkedList list2) {
        LinkedList result = new LinkedList();
        Node current1 = list1.head;
        Node current2 = list2.head;

        while (current1 != null && current2 != null) {
            if (current1.data <= current2.data) {
                result.insert(current1.data);
                current1 = current1.next;
            } else {
                result.insert(current2.data);
                current2 = current2.next;
            }
        }

        // Add remaining elements from list1
        while (current1 != null) {
            result.insert(current1.data);
            current1 = current1.next;
        }

        // Add remaining elements from list2
        while (current2 != null) {
            result.insert(current2.data);
            current2 = current2.next;
        }

        return result;
    }

    public void display() {
        Node current = head;
        while (current != null) {
            System.out.print(current.data + " ");
            current = current.next;
        }
        System.out.println();
    }
} 