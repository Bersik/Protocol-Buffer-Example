package com.test.service;

import com.pakulov.jersey.protobuf.internal.MediaTypeExt;
import com.test.proto.*;

import javax.ws.rs.*;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

import static com.test.service.Data.*;

@Path("/developer")
public class DeveloperService {

    Logger logger = Logger.getLogger(DeveloperService.class.getName());

    /**
     * Get all
     */
    @GET
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public DeveloperList getAllDevelopers() {
        logger.log(Level.INFO, "getAllDevelopers");
        return DeveloperList.newBuilder().addAllDevelopers(developers.values()).build();
    }

    /**
     * Get one
     */
    @GET
    @Path("/{id}")
    @Produces(MediaTypeExt.APPLICATION_PROTOBUF)
    public Developer getDeveloperById(@PathParam("id") int id) {
        if (developers.containsKey(id)){
            return developers.get(id);
        }
        return null;
    }

    /**
     * Add new
     */
    @PUT
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public void putDeveloper(Developer developer) {
        logger.log(Level.INFO, "Add new: " + developer.getId() +") "+ developer.getName());
        if (!developers.containsKey(developer.getId())) {
            developers.put(developer.getId(), developer);
        }
    }

    /**
     * Update (edit)
     */
    @POST
    @Path("/{id}")
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public void updateDeveloper(@PathParam("id") int id, Developer developer) {
        if (developers.containsKey(developer.getId())) {
            developers.put(developer.getId(), developer);
        }
    }

    /**
     * Delete
     */
    @DELETE
    @Path("/{id}")
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public void deleteDeveloper(@PathParam("id") int id) {
        if (developers.containsKey(id)) {
            developers.remove(id);
        }
    }

    /**
     * Get some by name
     */
    @POST
    @Path("/getByName")
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    @Produces(MediaTypeExt.APPLICATION_PROTOBUF)
    public DeveloperList getDevelopersByName(Search search) {
        List<Developer> res = new ArrayList<>();
        for (Developer developer : developers.values()) {
            if (developer.getName().equals(search.getName())) {
                res.add(developer);
            }
        }
        return DeveloperList.newBuilder().addAllDevelopers(res).build();
    }
}
