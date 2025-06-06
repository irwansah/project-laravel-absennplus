USE [master]
GO
/****** Object:  Database [AbsenPlus_DB]    Script Date: 4/30/2025 16:02:19 ******/
CREATE DATABASE [AbsenPlus_DB]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'AbsenPlus_DB', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\AbsenPlus_DB.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'AbsenPlus_DB_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\AbsenPlus_DB_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [AbsenPlus_DB] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [AbsenPlus_DB].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [AbsenPlus_DB] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET ARITHABORT OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [AbsenPlus_DB] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [AbsenPlus_DB] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET  DISABLE_BROKER 
GO
ALTER DATABASE [AbsenPlus_DB] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [AbsenPlus_DB] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET RECOVERY FULL 
GO
ALTER DATABASE [AbsenPlus_DB] SET  MULTI_USER 
GO
ALTER DATABASE [AbsenPlus_DB] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [AbsenPlus_DB] SET DB_CHAINING OFF 
GO
ALTER DATABASE [AbsenPlus_DB] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [AbsenPlus_DB] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [AbsenPlus_DB] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'AbsenPlus_DB', N'ON'
GO
ALTER DATABASE [AbsenPlus_DB] SET QUERY_STORE = OFF
GO
USE [AbsenPlus_DB]
GO
/****** Object:  Table [dbo].[attendance__histories]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[attendance__histories](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[Date] [datetime] NOT NULL,
	[status] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[attendances]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[attendances](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[checkInTime] [datetime] NULL,
	[checkOutTime] [datetime] NULL,
	[remarks] [nvarchar](255) NULL,
	[status] [varchar](50) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [PK__attendan__3213E83F35A8E3C6] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[cache]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cache](
	[key] [nvarchar](255) NOT NULL,
	[value] [nvarchar](max) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[cache_locks]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cache_locks](
	[key] [nvarchar](255) NOT NULL,
	[owner] [nvarchar](255) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_locks_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[failed_jobs]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[uuid] [nvarchar](255) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[job_batches]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[job_batches](
	[id] [nvarchar](255) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[total_jobs] [int] NOT NULL,
	[pending_jobs] [int] NOT NULL,
	[failed_jobs] [int] NOT NULL,
	[failed_job_ids] [nvarchar](max) NOT NULL,
	[options] [nvarchar](max) NULL,
	[cancelled_at] [int] NULL,
	[created_at] [int] NOT NULL,
	[finished_at] [int] NULL,
 CONSTRAINT [job_batches_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[jobs]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[queue] [nvarchar](255) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[attempts] [tinyint] NOT NULL,
	[reserved_at] [int] NULL,
	[available_at] [int] NOT NULL,
	[created_at] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[leave__approvals]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[leave__approvals](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[LeaveRequestId] [bigint] NOT NULL,
	[ApprovalDate] [datetime] NOT NULL,
	[reason] [nvarchar](255) NULL,
	[status] [nvarchar](255) NOT NULL,
	[postBy] [int] NULL,
	[postDate] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[leave__requests]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[leave__requests](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[startDate] [date] NOT NULL,
	[endDate] [date] NOT NULL,
	[reason] [nvarchar](255) NULL,
	[status] [nvarchar](255) NOT NULL,
	[lampiran] [varchar](max) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [PK__leave__r__3213E83F7B315EB0] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[lembur]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[lembur](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[status] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[overtime__approvals]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[overtime__approvals](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[OvtRequestId] [bigint] NOT NULL,
	[ApprovalDate] [datetime] NOT NULL,
	[reason] [nvarchar](255) NULL,
	[status] [nvarchar](255) NOT NULL,
	[postBy] [int] NULL,
	[postDate] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[overtime__requests]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[overtime__requests](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[requestDate] [datetime] NOT NULL,
	[reason] [nvarchar](255) NULL,
	[status] [nvarchar](255) NOT NULL,
	[postBy] [int] NULL,
	[postDate] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_reset_tokens]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_reset_tokens](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [password_reset_tokens_email_primary] PRIMARY KEY CLUSTERED 
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pay_slips]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pay_slips](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[PayrollId] [bigint] NOT NULL,
	[filePath] [nvarchar](255) NOT NULL,
	[postBy] [int] NULL,
	[postDate] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[payrolls]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[payrolls](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[user_id] [bigint] NOT NULL,
	[payDate] [datetime] NOT NULL,
	[grossSalary] [float] NULL,
	[netSalary] [float] NULL,
	[postBy] [int] NULL,
	[postDate] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sessions]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sessions](
	[id] [nvarchar](255) NOT NULL,
	[user_id] [bigint] NULL,
	[ip_address] [nvarchar](45) NULL,
	[user_agent] [nvarchar](max) NULL,
	[payload] [nvarchar](max) NOT NULL,
	[last_activity] [int] NOT NULL,
 CONSTRAINT [sessions_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 4/30/2025 16:02:19 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](255) NOT NULL,
	[roles] [varchar](50) NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [PK__users__3213E83F391A54C1] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [failed_jobs_uuid_unique]    Script Date: 4/30/2025 16:02:19 ******/
CREATE UNIQUE NONCLUSTERED INDEX [failed_jobs_uuid_unique] ON [dbo].[failed_jobs]
(
	[uuid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [jobs_queue_index]    Script Date: 4/30/2025 16:02:20 ******/
CREATE NONCLUSTERED INDEX [jobs_queue_index] ON [dbo].[jobs]
(
	[queue] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [sessions_last_activity_index]    Script Date: 4/30/2025 16:02:20 ******/
CREATE NONCLUSTERED INDEX [sessions_last_activity_index] ON [dbo].[sessions]
(
	[last_activity] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [sessions_user_id_index]    Script Date: 4/30/2025 16:02:20 ******/
CREATE NONCLUSTERED INDEX [sessions_user_id_index] ON [dbo].[sessions]
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_email_unique]    Script Date: 4/30/2025 16:02:20 ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique] ON [dbo].[users]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[attendance__histories] ADD  CONSTRAINT [DF__attendanc__statu__66603565]  DEFAULT ('present') FOR [status]
GO
ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO
ALTER TABLE [dbo].[leave__approvals] ADD  DEFAULT ('pending') FOR [status]
GO
ALTER TABLE [dbo].[leave__requests] ADD  CONSTRAINT [DF__leave__re__statu__4D94879B]  DEFAULT (N'(''pending'',''Accepted'')') FOR [status]
GO
ALTER TABLE [dbo].[lembur] ADD  DEFAULT ('') FOR [status]
GO
ALTER TABLE [dbo].[overtime__approvals] ADD  DEFAULT ('pending') FOR [status]
GO
ALTER TABLE [dbo].[overtime__requests] ADD  DEFAULT ('pending') FOR [status]
GO
ALTER TABLE [dbo].[attendance__histories]  WITH CHECK ADD  CONSTRAINT [attendance__histories_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[attendance__histories] CHECK CONSTRAINT [attendance__histories_user_id_foreign]
GO
ALTER TABLE [dbo].[attendances]  WITH CHECK ADD  CONSTRAINT [attendances_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[attendances] CHECK CONSTRAINT [attendances_user_id_foreign]
GO
ALTER TABLE [dbo].[leave__approvals]  WITH CHECK ADD  CONSTRAINT [leave__approvals_leaverequestid_foreign] FOREIGN KEY([LeaveRequestId])
REFERENCES [dbo].[leave__requests] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[leave__approvals] CHECK CONSTRAINT [leave__approvals_leaverequestid_foreign]
GO
ALTER TABLE [dbo].[leave__requests]  WITH CHECK ADD  CONSTRAINT [leave__requests_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[leave__requests] CHECK CONSTRAINT [leave__requests_user_id_foreign]
GO
ALTER TABLE [dbo].[overtime__approvals]  WITH CHECK ADD  CONSTRAINT [overtime__approvals_ovtrequestid_foreign] FOREIGN KEY([OvtRequestId])
REFERENCES [dbo].[overtime__requests] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[overtime__approvals] CHECK CONSTRAINT [overtime__approvals_ovtrequestid_foreign]
GO
ALTER TABLE [dbo].[overtime__requests]  WITH CHECK ADD  CONSTRAINT [overtime__requests_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[overtime__requests] CHECK CONSTRAINT [overtime__requests_user_id_foreign]
GO
ALTER TABLE [dbo].[pay_slips]  WITH CHECK ADD  CONSTRAINT [pay_slips_payrollid_foreign] FOREIGN KEY([PayrollId])
REFERENCES [dbo].[payrolls] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[pay_slips] CHECK CONSTRAINT [pay_slips_payrollid_foreign]
GO
ALTER TABLE [dbo].[payrolls]  WITH CHECK ADD  CONSTRAINT [payrolls_user_id_foreign] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[payrolls] CHECK CONSTRAINT [payrolls_user_id_foreign]
GO
ALTER TABLE [dbo].[attendance__histories]  WITH CHECK ADD CHECK  (([status]=N'not present' OR [status]=N'present'))
GO
ALTER TABLE [dbo].[leave__approvals]  WITH CHECK ADD CHECK  (([status]=N'rejected' OR [status]=N'approved' OR [status]=N'pending'))
GO
ALTER TABLE [dbo].[leave__requests]  WITH CHECK ADD  CONSTRAINT [CK__leave__re__statu__4CA06362] CHECK  (([status]=N'rejected' OR [status]=N'approved' OR [status]=N'pending'))
GO
ALTER TABLE [dbo].[leave__requests] CHECK CONSTRAINT [CK__leave__re__statu__4CA06362]
GO
ALTER TABLE [dbo].[overtime__approvals]  WITH CHECK ADD CHECK  (([status]=N'rejected' OR [status]=N'approved' OR [status]=N'pending'))
GO
ALTER TABLE [dbo].[overtime__requests]  WITH CHECK ADD CHECK  (([status]=N'rejected' OR [status]=N'approved' OR [status]=N'pending'))
GO
/****** Object:  StoredProcedure [dbo].[sp__InsertAntendances]    Script Date: 4/30/2025 16:02:20 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[sp__InsertAntendances]
	-- Add the parameters for the stored procedure here
	@user_id int
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	IF EXISTS (SELECT 1 FROM dbo.attendances WHERE user_id = @user_id AND checkOutTime IS NULL)
	BEGIN
		UPDATE dbo.attendances
		SET checkOutTime = GETDATE(),
			updated_at = GETDATE()
		WHERE user_id = @user_id AND checkOutTime IS NULL
	END
	ELSE
	BEGIN
		INSERT INTO dbo.attendances (user_id, checkInTime, status,created_at)
		VALUES (@user_id, GETDATE(), 'present', GETDATE())
	END
END
GO
USE [master]
GO
ALTER DATABASE [AbsenPlus_DB] SET  READ_WRITE 
GO
