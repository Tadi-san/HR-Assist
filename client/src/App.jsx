import './App.css'
import LandingPage from './pages/landingpage/landingPageLayout'
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'
import Dashboard from './pages/Dashboard/layouts/dashboard'
import Auth from './pages/Dashboard/layouts/auth'
import JobSearch from './pages/job search/jobsearch'
function App() {
  return (
        <Routes>
          <Route path="/" element={<LandingPage />} />
          <Route path="/dashboard/*" element={<Dashboard />} />
          <Route path="/auth/*" element={<Auth />} />
          <Route path="/job/*" element={<JobSearch />} />
        </Routes>
    );
}

export default App
