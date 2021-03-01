package cz.durovic.library;

import java.util.*;

public class User extends Account {
    private String address;
    private ArrayList<Loan> borrowedBooks;
    private ArrayList<Request> requestedBooks;

    // constructor
    public User(int id, String nameSurname, String address, String phoneNumber, String email) {
        super(id, nameSurname, phoneNumber, email);
        this.address = address;
        borrowedBooks = new ArrayList();
        requestedBooks = new ArrayList();
    }

    @Override
    public void printInfo() {};

    public void printBorrowedBooks() {}

    public void printRequestedBooks() {}

    public void addBorrowedBook() {}

    public void removeBorrowedBook() {}

    public void addRequestBook() {}

    public void removeRequestBook() {}


    // setter
    public void setAddress(String address) {
        this.address = address;
    }

    // getters
    public ArrayList<Loan> getBorrowedBooks() {
        return borrowedBooks;
    }

    public ArrayList<Request> getRequestedBooks() {
        return requestedBooks;
    }
}
