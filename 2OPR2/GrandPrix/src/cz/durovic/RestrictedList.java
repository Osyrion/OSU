package cz.durovic;

import java.util.*;

public class RestrictedList<T extends Comparable<T>> implements Iterable<T> {
    private final List<T> inner = new ArrayList<>();

    @Override
    public Iterator<T> iterator() {
        return this.inner.iterator();
    }

    public void add(T item) {
        if (item != null) {
            inner.add(item);
        } else {
            throw new NullArgumentException("'item to add'");
        }
    }

    public int size() {
        return inner.size();
    }

    public T get(int index) {
        return inner.get(index);
    }

    public void sort() {
        Collections.sort(this.inner);
    }

    public void sort(Comparator<T> comparator) {
        Collections.sort(this.inner, comparator);
    }

    public void sortAndPrint() {
        Collections.sort(this.inner);

        int i = 1;
        for (T rr : this.inner) {
            System.out.println(i + ". " + rr);
            i++;
        }
    }

}
