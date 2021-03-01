package cz.durovic.library;

import java.util.*;

public class Book {
    private String author;
    private String title;
    private String ISBN;
    private String publisher;
    private boolean isAvailable;
    private ArrayList<Request> requestedBooks;

    // constructor
    public Book() {
    }

    // print info about book
    public void printInfo() {}

    // add to array of requests
    public void addRequest(Request request) {}

    // remove from array of requests
    public void removeRequest() {}

    // print all requests on that particular book
    public void printRequests() {}

    // create request for that particular book
    public void createBookRequest(User user) {}

    // if user has already borrowed that particular book
    public void madeBookRequest(User user) {}

    public void returnBook(Loan loan, User user, Staff staff) {}

    public void borrowBook(User user, Staff staff) {}

    /** GETTERS */
    public String getAuthor() {
        return author;
    }

    public String getISBN() {
        return ISBN;
    }

    public String getPublisher() {
        return publisher;
    }

    public String getTitle() {
        return title;
    }

    public ArrayList<Request> getRequestedBooks() {
        return requestedBooks;
    }

    /** SETTERS */
    public void setAuthor(String author) {
        this.author = author;
    }

    public void setISBN(String ISBN) {
        this.ISBN = ISBN;
    }

    public void setPublisher(String publisher) {
        this.publisher = publisher;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public void setAvailable(boolean available) {
        isAvailable = available;
    }

}

