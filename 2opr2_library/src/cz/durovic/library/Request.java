package cz.durovic.library;

import java.util.*;

public class Request {
    private User user;
    private Book book;
    private Date requestDate;

    // constructor
    public Request() {}

    public User getUser() {
        return user;
    }

    public Book getBook() {
        return book;
    }

    public Date getRequestDate() {
        return requestDate;
    }

    // print info about request
    public void printInfo() {}

}
