# Use the official Golang image as the base image
FROM golang:1.23.2

# Set the working directory inside the container
WORKDIR /app

# Copy the Go module files and download dependencies
RUN go mod tidy

# Download dependencies
RUN go mod download

# Copy the rest of the application code
COPY . .

# Expose the port your application will run on
EXPOSE 8181

# Command to run your Go application
CMD ["go", "run", "main.go"]
