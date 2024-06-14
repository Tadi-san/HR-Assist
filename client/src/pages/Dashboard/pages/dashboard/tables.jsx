import {
  Card,
  CardHeader,
  CardBody,
  Typography,
  Avatar,
  Progress,
} from "@material-tailwind/react";
import { EllipsisVerticalIcon } from "@heroicons/react/24/outline";
import { authorsTableData, projectsTableData } from "../../data";
import { useState } from "react";
export function Tables() {
  
const [addButton, setAddButton] = useState(false);

function handeleAddButton(jobID){
  setAddButton(true)

  console.log(jobID)
}
  return (
    <div className="mt-12 mb-8 flex flex-col gap-12">
          
      <Card>
        <CardHeader variant="gradient" color="gray" className="mb-8 p-6">
          <Typography variant="h6" color="white" className="flex justify-between">
            <span>FrontEnd Developer</span>
            <div className="flex gap-4">
              <span>100 applicants</span>
            <button name="1" onClick={(ev)=>handeleAddButton(ev.target.name)}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
  <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
</button>
            <button><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
  <path strokeLinecap="round" strokeLinejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
</svg>
</button>
            </div>
          </Typography>
        </CardHeader>
        {addButton?
        <CardHeader variant="gradient" color="white" className="mb-8 p-4 ">
          <Typography variant="h6" color="white" className="flex justify-between items-center">
            <span className="text-black">FrontEnd Developer</span>
            <div className="flex gap-4 items-center">
              <span className="text-gray-600 text-sm">manualy import Cv's of aplicants from other platforms here</span>
              <label className="flex cursor-pointer border p-2 rounded-lg  bg-gray-100 text-black"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6"> <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg> 
<input type="file" className="hidden"/>
<span>Import</span>
</label>
            <button onClick={()=>setAddButton(false)}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6 text-black">
  <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg>

</button>              </div>
          </Typography>
        </CardHeader>     
        :""}
        <CardBody className="overflow-x-scroll px-0 pt-0 pb-2">
        <table className="w-full min-w-[640px] table-auto">
              <thead>
                <tr>
                  {["Name", "day", "Match"].map(
                    (el) => (
                      <th
                        key={el}
                        className="border-b border-blue-gray-50 py-3 px-6 text-left"
                      >
                        <Typography
                          variant="small"
                          className="text-[11px] font-medium uppercase text-blue-gray-400"
                        >
                          {el}
                        </Typography>
                      </th>
                    )
                  )}
                </tr>
              </thead>
              <tbody>
                {projectsTableData.map(
                  ({ img, name, budget, completion }, key) => {
                    const className = `py-3 px-5 ${
                      key === projectsTableData.length - 1
                        ? ""
                        : "border-b border-blue-gray-50"
                    }`;

                    return (
                      <tr key={name}>
                        <td className={className}>
                          <div className="flex items-center gap-4">
                            <Avatar src={img} alt={name} size="sm" />
                            <Typography
                              variant="small"
                              color="blue-gray"
                              className="font-bold"
                            >
                              {name}
                            </Typography>
                          </div>
                        </td>
                        <td className={className}>
                          <Typography
                            variant="small"
                            className="text-xs font-medium text-blue-gray-600"
                          >
                            {budget}
                          </Typography>
                        </td>
                        <td className={className}>
                          <div className="w-10/12">
                            <Typography
                              variant="small"
                              className="mb-1 block text-xs font-medium text-blue-gray-600"
                            >
                              {completion}%
                            </Typography>
                            <Progress
                              value={completion}
                              variant="gradient"
                              color={completion === 100 ? "green" : "blue"}
                              className="h-1"
                            />
                          </div>
                        </td>
                      </tr>
                    );
                  }
                )}
              </tbody>
            </table>
        </CardBody>
      </Card>

      </div>
  );
}

export default Tables;
