package com.test.service;

import com.pakulov.jersey.protobuf.internal.MediaTypeExt;
import com.test.proto.*;

import javax.ws.rs.*;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

import static com.test.service.Data.*;
import static com.test.service.Data.software;

@Path("/software")
public class SoftwareService {

    Logger logger = Logger.getLogger(SoftwareService.class.getName());

    /**
     * Get all
     */
    @GET
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public SoftwareList getAllSoftware() {
        return SoftwareList.newBuilder().addAllSoftwares(software.values()).build();
    }

    /**
     * Get one
     */
    @GET
    @Path("/{id}")
    @Produces(MediaTypeExt.APPLICATION_PROTOBUF)
    public Software getSoftwareById(@PathParam("id") int id) {
        if (software.containsKey(id)) {
            return software.get(id);
        }
        return null;
    }

    /**
     * Add new
     */
    @PUT
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public void putSoftware(Software software_) {
        logger.log(Level.INFO, "Add new: " + software_.getId() + ") " + software_.getName());
        if (!software.containsKey(software_.getId())) {
            List<Developer> softDevelopers = software_.getDevelopersList();
            for (int i = 0; i < softDevelopers.size(); i++) {
                if (developers.containsKey(softDevelopers.get(i).getId())) {
                    softDevelopers.set(i, developers.get(softDevelopers.get(i).getId()));
                } else {
                    return;
                }
            }
            software.put(software_.getId(), software_);
        }
    }

    /**
     * Update (edit)
     */
    @POST
    @Path("/{id}")
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public void updateSoftware(@PathParam("id") int id, Software software_) {
        if (software.containsKey(id)) {
            List<Developer> softDevelopers = software_.getDevelopersList();
            for (int i = 0; i < softDevelopers.size(); i++) {
                if (developers.containsKey(softDevelopers.get(i).getId())) {
                    softDevelopers.set(i, developers.get(softDevelopers.get(i).getId()));
                } else {
                    return;
                }
            }
            software.put(id, software_);
        }
    }

    /**
     * Delete
     */
    @DELETE
    @Path("/{id}")
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    public void deleteSoftware(@PathParam("id") int id) {
        if (software.containsKey(id)) {
            software.remove(id);
        }
    }

    /**
     * Get some by name
     */
    @POST
    @Path("/getByName")
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    @Produces(MediaTypeExt.APPLICATION_PROTOBUF)
    public SoftwareList getSoftwareByName(Search search) {
        List<Software> res = new ArrayList<>();
        for (Software soft : software.values()) {
            if (soft.getName().equals(search.getName())) {
                res.add(soft);
            }
        }
        return SoftwareList.newBuilder().addAllSoftwares(res).build();
    }

    /**
     * Get Software By Developer
     */
    @POST
    @Path("/getSoftwareByDeveloper")
    @Consumes(MediaTypeExt.APPLICATION_PROTOBUF)
    @Produces(MediaTypeExt.APPLICATION_PROTOBUF)
    public SoftwareList getSoftwareByDeveloper(Developer developer) {
        List<Software> res = new ArrayList<>();
        for (Software soft : software.values()) {
            for (Developer developer1 : soft.getDevelopersList()) {
                if (developer.equals(developer1)) {
                    res.add(soft);
                }
            }
        }
        return SoftwareList.newBuilder().addAllSoftwares(res).build();
    }
}
