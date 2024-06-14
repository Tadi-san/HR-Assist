import Navbar from "./components/Navbar"
import Header from "./components/Header"
import SearchBar from "./components/SearchBar"
import JobCard from "./components/JobCard"
import jobData from "./JobDummyData"

function JobSearch() {
  return (
    <div>
      <Navbar />
      <Header />
      <SearchBar fetchJobsCustom={""}/>
      {jobData && 
        <button onClick={jobData} className="flex pl-[1250px] mb-2">
          <p className="bg-blue-500 px-10 py-2 rounded-md text-white">Clear Filters</p>
        </button>
      }
      {jobData.map((job)=> (
        <JobCard key={job.id} {...job}/>
      ))}
    </div>
  )
}

export default JobSearch
