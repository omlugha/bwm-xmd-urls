
import { useEffect } from "react";

const Index = () => {
  useEffect(() => {
    // Automatically redirect to the external website
    window.location.href = "https://bwmxmd.online";
  }, []);

  return (
    <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-primary/20 to-secondary/20">
      <div className="text-center">
        <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-primary mx-auto mb-4"></div>
        <p className="text-muted-foreground">Redirecting to bwmxmd.online...</p>
      </div>
    </div>
  );
};

export default Index;
