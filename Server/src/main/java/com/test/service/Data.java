package com.test.service;

import com.test.proto.Developer;
import com.test.proto.Software;

import java.util.HashMap;
import java.util.Map;

public class Data {

    public static Map<Integer,Developer> developers = new HashMap<>();
    public static Map<Integer,Software> software = new HashMap<>();

    static {
        developers.put(1,Developer.newBuilder().setId(1).setEmail("dev1@mail.com").setName("Dev1").build());
        software.put(1,Software.newBuilder().setId(1).setName("Software1").addDevelopers(developers.get(1)).build());
        software.put(3,Software.newBuilder().setId(3).setName("Software3").build());
    }

}
