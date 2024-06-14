import React from "react";
import {
  Typography,
 
  Card,
  CardHeader,
  CardBody,
} from "@material-tailwind/react";

export function Create() {
   return (
    <div className="mx-auto my-20 flex max-w-screen-lg flex-col gap-8">
      <Card>
        <CardHeader
          color="transparent"
          floated={false}
          shadow={false}
          className="m-0 p-4"
        >
          <Typography variant="h5" color="blue-gray">
            Add a Job
          </Typography>
        </CardHeader>
        <CardBody className="flex flex-col gap-4 p-4">
          <form>
            <div className="flex flex-col items-start mb-6">
            <span>Title of the job:</span>
            <input type="text" className=" bg-transparent border  rounded-lg p-2 " />
            </div>
            <div className="flex flex-col items-start mb-6">
            <span>Add information about the job</span>
            <span className="text-xs">company/job discription/requirements</span>
            <textarea type= "text" className=" bg-transparent border  rounded-lg p-2 w-full min-h-32" />
            </div>
             <button className= "bg-gray-800  border  rounded-lg p-2 text-white">
             Submit
             </button>
          </form>
        </CardBody>
      </Card>
    </div>
  );
}

export default Create;
