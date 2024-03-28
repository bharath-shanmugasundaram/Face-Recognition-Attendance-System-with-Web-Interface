import cv2
import numpy as np
import mysql.connector
import face_recognition
from datetime import datetime

def record_attendance(conn, name, reg_number, time):
    query = "INSERT INTO apo.attendance (NAME, reg_num, TIME) VALUES (%s, %s, %s)"
    cursor = conn.cursor()
    try:
        cursor.execute(query, (name, reg_number, time))
        conn.commit()
        return True
    except mysql.connector.Error as error:
        print(f"Error: {error}")
        return False

video_capture = cv2.VideoCapture(0)

#use your database name ... (-_-)
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="apo"
)

if conn.is_connected():
    print("Connected to the MySQL database")
else:
    print("Error: Not connected to MySQL database")

known_faces = {
    "Agasra": {"reg_number": "611223114002", "image_path": "source_image/ambani.jpg"},
    "Atshya": {"reg_number": "611223114014", "image_path": "source_image/mark.jpg"},
    "Boopesh": {"reg_number": "611223114015", "image_path": "source_image/elon.jpg"},
    "Bharath": {"reg_number": "611223114011", "image_path": "source_image/tata.jpg"}
}

known_face_encodings = {}
known_face_names = []

for name, info in known_faces.items():
    image = face_recognition.load_image_file(info["image_path"])
    face_encoding = face_recognition.face_encodings(image)[0]
    known_face_encodings[name] = face_encoding
    known_face_names.append(name)

attended_persons = set()

while True:
    ret, frame = video_capture.read()

    if not ret:
        print("Can't read frame")
        break

    rgb_frame = frame[:, :, ::-1]  

    face_locations = face_recognition.face_locations(rgb_frame)
    face_encodings = face_recognition.face_encodings(rgb_frame, face_locations)

    for face_encoding in face_encodings:
        distances = face_recognition.face_distance(list(known_face_encodings.values()), face_encoding)
        min_distance_index = np.argmin(distances)
        min_distance = distances[min_distance_index]
        name = known_face_names[min_distance_index]

        if min_distance < 0.6 and name not in attended_persons:
            reg_number = known_faces[name]["reg_number"]
            if not record_attendance(conn, name, reg_number, datetime.now().strftime("%Y-%m-%d %H:%M:%S")):
                print(f"Error: Attendance record for {name} failed")
            attended_persons.add(name)

    num_people = len(attended_persons)
    cv2.putText(frame, f"People: {num_people}", (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2)

    cv2.imshow("frame", frame)

    if cv2.waitKey(1) & 0xFF == ord("q"):
        break

video_capture.release()
cv2.destroyAllWindows()
conn.close()
