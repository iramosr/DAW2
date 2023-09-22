package com.daw2.aprendejsp02.dao;

import java.io.Serializable;
import java.util.List;

public interface GenericDao <T,PK extends Serializable >{
    PK add (T entity);
 Boolean add(List<T>list);

 Boolean uptade(T entity);

 Boolean delete(long id);

 Boolean deleteAll();

 T get(long id);

 List<T> findAll();
}
